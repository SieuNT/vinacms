CKEditor custom from mihaildev package

```php
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;

CKEditor::widget([
    'editorOptions' => [
        'preset' => 'full', //basic, standard, full
        'inline' => false, //default false
    ]
]);

//или c ActiveForm

echo $form->field($post, 'content')->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //basic, standard, full
        'inline' => false, //default false
    ],
]);
```