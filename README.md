# HTML form builder for PHP

## Usage
### Code
```php
<?php declare(strict_types=1);

use HtmlFormBuilder\Form\Attribute\FormAttribute;
use HtmlFormBuilder\Form\Attribute\FormAttributeType;
use HtmlFormBuilder\Form\Attribute\FormMethodAttribute;
use HtmlFormBuilder\FormBuilder;
use HtmlFormBuilder\FormElement\FormElementAttribute\FormElementAttribute;
use HtmlFormBuilder\FormElement\InputFormElement\InputFormElement;
use HtmlFormBuilder\FormElement\InputFormElement\InputFormElementType;
use HtmlFormBuilder\FormElement\SelectFormElement\OptionFormElement;
use HtmlFormBuilder\FormElement\SelectFormElement\SelectFormElement;

require_once(__DIR__ . '/vendor/autoload.php');

$form_builder = new FormBuilder();

$form_builder->addFormAttribute(new FormAttribute(FormAttributeType::METHOD, FormMethodAttribute::GET))
    ->addFormAttribute(new FormAttribute(FormAttributeType::NAME, "form__test"))
    ->addFormElement((new InputFormElement(
            InputFormElementType::EMAIL,
            "email_field",
            "Your E-Email"
        ))->addAttribute(new FormElementAttribute(
            "id",
            "email_field"
        )))
    ->addFormElement((new InputFormElement(
        InputFormElementType::IMAGE,
        "image_input",
        "Upload an image"
        ))->addAttribute(new FormElementAttribute(
        "src",
        "my_image.png"
        ))->addAttribute(new FormElementAttribute(
        "alt",
        "Submit Image"
    )))
    ->addFormElement((new SelectFormElement(
        "gender_select",
        "Select your gender"
    ))->addOption(new OptionFormElement(
        "Male"
    ))->addOption(new OptionFormElement(
        "Female"
    ))->addOption(new OptionFormElement(
        "Other"
    )));

$form = $form_builder->build();

print_r($form->render());
```

### Output
```html
<form method="GET" name="form__test">
    
<label for="email_field">Your E-Email</label>
<input type="email" name="email_field" id="email_field" />
    
<label for="image_input">Upload an image</label>
<input type="image" name="image_input" src="my_image.png" alt="Submit Image" />

<label for="gender_select">Select your gender</label>
<select name="gender_select">
    <option>Male</option>
    <option>Female</option>
    <option>Other</option>
</select>

</form>
```
