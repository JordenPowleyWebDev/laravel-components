# Card

## Blade Component Usage
A basic card component can be imported using the following syntax.

### x-laravel-components-card

```html
    <x-laravel-components-card :classes="$classes" >
        ...
    </x-laravel-components-card>
```
| Attribute    | Required | Values                                    |
|--------------|----------|-------------------------------------------|
| classes      | No       | See 'Classes Array Values'                |

Classes Array Values:

| Key       | Details                            |
|-----------|------------------------------------|
| container | Classes for the outer container    |
| inner     | Classes for the inner container    |

### x-laravel-components-card-header

A card header component can be imported using the following syntax.
```html
    <x-laravel-components-card-header title="$title" :classes="$classes">
        ...
    </x-laravel-components-card-header>
```

| Attribute    | Required | Values                                    |
|--------------|----------|-------------------------------------------|
| title        | No       | An inline title to be displayed           |
| classes      | No       | See 'Classes Array Values'                |

Classes Array Values:

| Key       | Details                         |
|-----------|---------------------------------|
| container | Classes for the outer container |
| title     | Classes for the title           |

### x-laravel-components-card-data

A card data component can be imported using the following syntax.
```html
    <x-laravel-components-card-data
        :data="[['label' => 'Name', 'value' => 'Item One'], ['label' => 'Name', 'value' => 'Item Two'], ['label' => 'Name', 'value' => 'Item Three'], ['label' => 'Name', 'value' => 'Item Four']]"
        :classes="$classes"
    />
```

| Attribute | Required | Values                              |
|-----------|----------|-------------------------------------|
| data      | Yes      | Array of data items to be displayed |
| classes   | No       | See 'Classes Array Values'          |

Classes Array Values:

| Key       | Details                                  |
|-----------|------------------------------------------|
| container | Classes for the outer container          |
| column    | Classes for each column                  |
| label     | Classes for the label for each data item |
| value     | Classes for the value for each data item |