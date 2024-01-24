<?php

$arResult['INPUTS'] = [];
$error_message = $arResult['ERROR_MESSAGE'];

// title error
$arResult['ERROR_TITLE'] = \TAO::frontend()->renderBlock(
    'assets/error',
    [
        'error_text' => ' - поля обязательны для заполнения'
    ]
);


// input user_name
$arResult['INPUTS']['USER_NAME']['ERROR'] = \TAO::frontend()->renderBlock(
    'assets/error',
    [
        'error_text' => 'Заполните ваше имя!',
        'optionClass' => 'user_name'
    ]
);


$arResult['INPUTS']['USER_NAME']['INPUT'] = \TAO::frontend()->renderBlock(
    'inputs/input-text',
    [
        'value' => !empty($error_message) ? $arResult['AUTHOR_NAME'] : '',
        'placeholder' => 'Ваше имя',
        'name' => 'user_name'
    ]
);

// input email
$arResult['INPUTS']['EMAIL']['ERROR'] = \TAO::frontend()->renderBlock(
    'assets/error',
    [
        'error_text' => 'Заполните ваш E-mail!',
        'optionClass' => 'user_email'
    ]
);


$arResult['INPUTS']['EMAIL']['INPUT'] = \TAO::frontend()->renderBlock(
    'inputs/input-text',
    [
        'value' => !empty($error_message) ? $arResult['AUTHOR_EMAIL'] : '',
        'placeholder' => 'Ваш E-Mail',
        'name' => 'user_email'
    ]
);

// input phone
$arResult['INPUTS']['PHONE']['ERROR'] = \TAO::frontend()->renderBlock(
    'assets/error',
    [
        'error_text' => 'Заполните ваш телефон!',
        'optionClass' => 'user_phone'
    ]
);


$arResult['INPUTS']['PHONE']['INPUT'] = \TAO::frontend()->renderBlock(
    'inputs/input-text',
    [
        'value' => !empty($error_message) ? $arResult['AUTHOR_PHONE'] : '',
        'placeholder' => 'Ваш телефон',
        'name' => 'user_phone',
    ]
);

// select categories
$arResult['INPUTS']['CATEGORIES']['INPUT'] = \TAO::frontend()->renderBlock(
    'inputs/select',
    [
        'value' => $arResult['CHAPTER_LIST'],
        'name' => 'chapter'
    ]
);

// textarea
$arResult['INPUTS']['MESSAGE']['ERROR'] = \TAO::frontend()->renderBlock(
    'assets/error',
    [
        'error_text' => 'Напишите сообщение!',
        'optionClass' => 'MESSAGE'
    ]
);


$arResult['INPUTS']['MESSAGE']['INPUT'] = \TAO::frontend()->renderBlock(
    'inputs/textarea',
    [
        'value' => $arResult['MESSAGE'],
        'placeholder' => 'Сообщение',
        'name' => 'MESSAGE',
        'cols' => '40',
        'rows' => 5
    ]
);

// submit button
$arResult['SUBMIT_BUTTON'] = \TAO::frontend()->renderBlock(
    'assets/button',
    [
        'type' => 'submit',
        'name' => 'submit',
        'value' => 'Отправить'
    ]
);

$arResult['PARAMS_HASH_INPUT'] = '<input type="hidden" name="PARAMS_HASH" value=" ' . $arResult['PARAMS_HASH'] . '">';

if(is_null($arResult['ERROR_MESSAGE']) && !is_null($arResult['OK_MESSAGE'])) {
    $arResult['OK_MESSAGE_BLOCK'] = \TAO::frontend()->renderBlock(
        'assets/ok-message',
        [
            'text' => 'Сообщение успешно отправлено!'
        ]
    );
}

// dd($arResult);