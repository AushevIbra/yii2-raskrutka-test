<?php


namespace common\validators;


use common\models\db\RegSetting;
use yii\validators\Validator;

class EmailsValidator extends Validator
{

    /**
     * Валидация нескольких эмайлов
     *
     * @param \yii\base\Model $model
     * @param string          $attribute
     *
     * @author Aushev Ibra <aushevibra@yandex.ru>
     */
    public function validateAttribute($model, $attribute)
    {
        $emails     = array_filter(explode(',', $model->value));
        $trimEmails = [];
        $validator  = new EmailValidator();
        foreach ($emails as $email) {
            $trimEmail = trim($email);
            if (false === $validator->validate($trimEmail, $error)) {
                $this->addError($model, RegSetting::ATTR_VALUE, 'Is not a valid email addresses.');
            }
            $trimEmails[] = $trimEmail;
        }

        $model->value = implode(",", $trimEmails);

    }
}