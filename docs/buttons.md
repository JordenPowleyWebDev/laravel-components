# Buttons
[Back](readme.md)

## Blade Component Usage
All buttons can be imported using the following syntax
```
<x-laravel-components-button
    type="$type"
    label="$label"
    :classes="$classes"
    :options="$options"
/>
```

| Attribute    | Required | Values                                    |
|--------------|----------|-------------------------------------------|
| type         | Yes      | `['submit', 'href', 'on_click', 'modal']` |
| label        | Yes      | Any string to be displayed                |
| classes      | No       | See 'Classes Array Values'                |
| options      | ~        | See 'Options Array Values'                |

Classes Array Values:

| Key       | Details                                |
|-----------|----------------------------------------|
| container | Classes for the outer button container |
| icon      | Classes for the inner button icon      |
| label     | Classes for the inner button label     |

Options Array Values:

| Key      | Button Type(s) | Required | Details                            |
|----------|----------------|----------|------------------------------------|
| href     | `['href']`     | Yes      | Href link for button               |
| target   | `['href']`     | No       | Target attribute value for button  |
| modal    | `['modal']`    | Yes      | Modal ID to trigger from button    |
| on_click | `['on_click']` | Yes      | onClick attribute value for button |
| form     | `['submit']`   | No       | Form ID attribute value for button |

#### Submit Button Example:
```
<x-laravel-components-button
    type="submit"
    label="Submit Button"
    :classes="['container' => 'btn-success']"
    :options="['form' => 'form-ID']"
/>
```

#### Href Button Example:
```
<x-laravel-components-button
    type="href"
    label="Href Button"
    :classes="['container' => 'btn-success']"
    :options="['href' => 'https://www.google.co.uk', 'target' => '_blank']"
/>
```

#### OnClick Button Example:
```
<x-laravel-components-button
    type="on_click"
    label="onClick Button"
    :classes="['container' => 'btn-success']"
    :options="['onClick' => 'console.log(\'EVENT\')']"
/>
```

#### Modal Button Example:
```
<x-laravel-components-button
    type="modal"
    label="Modal Button"
    :classes="['container' => 'btn-danger']"
    :options="['modal' => 'modal-ID']"
/>
```