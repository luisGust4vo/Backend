<?php
/*
 Este controlador possui várias ações para manipular despesas. Ele inclui uma verificação para notificar o usuário por e-mail após a criação de uma nova despesa. Além disso, ele usa a autorização com base em políticas (Policy) para garantir que o usuário tenha permissão para excluir uma despesa. Certifique-se de que as políticas correspondam às regras de autorização da sua aplicação.
*/
namespace App\Http\Controllers;
use App\Http\Requests\DespesaRequest;
use App\Models\Despesa;
use App\Notifications\EnviarEmailNotification;


    class DespesaController extends Controller
    {
        public function index()
        {
            $despesas = Despesa::all();
            return response()->json($despesas);
        }
    
        public function store(DespesaRequest $request)
        {
            $despesa = new Despesa($request->all());
            $despesa->save();
            if ($despesa->usuario && $despesa->usuario->email) { //Verifica se o usuário associado à despesa possui um e-mail e, em seguida, notifica por e-mail.
                Queue::push(function ($job) use ($despesa) {
                    $despesa->usuario->notify(new EnviarEmailNotification());
                    $job->delete();
                });
            }
            return response()->json($despesa, 201); 
        }
    
        public function show(Despesa $despesa) //Retorna uma despesa específica com base no ID.
        {
            return response()->json($despesa);
        }
    
        public function update(DespesaRequest $request, $id)
        {
            $despesa = Despesa::find($id);
        
            if (!$despesa) {
                return response()->json(['error' => 'Despesa não encontrada'], 404);
            }
        
            $despesa->update($request->all()); //Atualiza uma despesa existente com base no ID e na solicitação recebida.
            return response()->json($despesa);
        }

        
    
        public function destroy($id)  //Exclui uma despesa com base no ID.
        {
            $this->authorize('delete', $despesa);

            $despesa = Despesa::find($id);
        
            if (!$despesa) {
                return response()->json(['error' => 'Despesa não encontrada'], 404);
            }
        
            $despesa->delete();
        
            return response()->json(null, 204); 
        }
        
    }


