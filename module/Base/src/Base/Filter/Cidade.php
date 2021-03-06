<?php

namespace Base\Filter;

use Zend\InputFilter\InputFilter;

class Cidade extends InputFilter
{

    public function __construct()
    {

        $this->add(
            array(
                'name' => 'id',
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Digits',
                        'options' => array(
                            'messages' => array('notDigits' => 'ID inválido')
                        )
                    )
                )
            )
        );

        $this->add(
            array(
                'name' => 'nome',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array('isEmpty' => 'Digite um nome!')
                        )
                    )
                )
            )
        );

        $this->add(
            array(
                'name' => 'uf',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim')
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'messages' => array('stringLengthTooShort' => 'Deve ter no mínimo %min% caracteres', 'stringLengthTooLong' => 'Deve ter no maximo %max% caracteres'),
                            'min' => 2,
                            'max' => 2
                        )
                    )
                )
            )
        );

    }

}