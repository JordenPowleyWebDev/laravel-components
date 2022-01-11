# Dropdown

## Blade Component Usage
A basic dropdown can be built using the provided Blade components. Please see the following syntax.
```html
<x-laravel-components-dropdown-menu 
    label="$toggleLabel" 
    id="$dropdownId"
    :classes="$classes"
>
    <x-laravel-components-dropdown-item 
        label="$itemOneLabel" 
        href="$itemOneHref"
        :classes="$classes"
    />
    <x-laravel-components-dropdown-divider :classes="$classes" />
    <x-laravel-components-dropdown-item 
        label="$itemTwoLabel"
        href="$itemTwoHref" 
        :options="['target' => '_blank']"
        :classes="$classes"
    />
</x-laravel-components-dropdown-menu>
```

### x-laravel-components-dropdown-menu 

| Attribute | Required | Values                     |
|-----------|----------|----------------------------|
| label     | Yes      | The dropdown toggle label  |
| id        | Yes      | The unique dropdown ID     |
| classes   | No       | See 'Classes Array Values' |

Classes Array Values:

| Key       | Details                         |
|-----------|---------------------------------|
| container | Classes for the outer container |
| toggle    | Classes for toggle button       |
| menu      | Classes for the dropdown menu   |

### x-laravel-components-dropdown-item 

| Attribute | Required | Values                     |
|-----------|----------|----------------------------|
| label     | Yes      | The item label             |
| href      | Yes      | The item href              |
| classes   | No       | See 'Classes Array Values' |
| options   | No       | See 'Options Array Values' |

Classes Array Values:

| Key       | Details                         |
|-----------|---------------------------------|
| container | Classes for the outer container |

Options Array Values:

| Key      | Details                            |
|----------|------------------------------------|
| target   | Target attribute value for button  |

### x-laravel-components-dropdown-divider

| Attribute | Required | Values                     |
|-----------|----------|----------------------------|
| classes   | No       | See 'Classes Array Values' |

Classes Array Values:

| Key       | Details                         |
|-----------|---------------------------------|
| container | Classes for the outer container |