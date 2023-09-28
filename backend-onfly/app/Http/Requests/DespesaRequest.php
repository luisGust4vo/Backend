<?php

class DespesaRequest extends FormRequest
{

    public function authorize()
    {

        return true;
    }

    public function rules()
    {
        // Definimos as regras de validação para os campos da solicitação.
        return [
            'descricao' => 'required|max:191',
            'data' => 'required|date|before_or_equal:today',
            'valor' => 'required|numeric|min:0',
            'usuario_id' => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'data.before_or_equal' => 'A data não pode ser no futuro.',
            'usuario_id.exists' => 'Não existe usuário cadastrado com o ID fornecido.',
        ];
    }
}




