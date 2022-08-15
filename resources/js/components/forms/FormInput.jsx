import React from 'react';
import Label from "./Label";
import Select from "./inputs/Select";
import Textarea from "./inputs/Textarea";
import BasicInput from "./inputs/BasicInput";
import Error from "./Error";
import SearchableSelect from "./inputs/SearchableSelect";
import Date from "./inputs/Date";

const FormInput = (props) => {
    const {
        classes         = {},
        name            = '',
        label           = '',
        type            = 'text',
        description     = null,
        required        = false,
        error           = false,
        value           = '',
        inputAttributes = [],
        onChange        = (value) => {}
    } = props;

    let labelComponent = null;
    let inputComponent = null;
    let errorComponent = null;

    const nodes = ['container', 'description', 'input-container'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-form-label-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['form']['form-input'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    if (required) {
        processedClasses.container= processedClasses.container+' required';
    }

    if (!!label) {
        labelComponent = (
            <Label
                name={name}
                label={label}
                required={required}
                type={type}
                classes={!!classes && !!classes['label-component'] ? classes['label-component'] : []}
            />
        )
    }

    if (!!type && type === "select") {
        inputComponent = (
            <Select
                name={name}
                required={required}
                value={value}
                options={!!inputAttributes && !!inputAttributes['options'] ? inputAttributes['options'] : []}
                classes={!!classes && !!classes['input-component'] ? classes['input-component'] : []}
                inputAttributes={!!inputAttributes && !!inputAttributes['attributes'] ? inputAttributes['attributes'] : []}
                onChange={onChange}
            />
        );
    } else if (!!type && type === "file") {
        // TODO - Include
    } else if (!!type && type === "textarea") {
        inputComponent = (
            <Textarea
                name={name}
                required={required}
                value={value}
                classes={!!classes && !!classes['input-component'] ? classes['input-component'] : []}
                inputAttributes={!!inputAttributes && !!inputAttributes['attributes'] ? inputAttributes['attributes'] : []}
                onChange={onChange}
            />
        );
    } else if (!!type && type === "date") {
        inputComponent = (
            <Date
                name={name}
                required={required}
                value={value}
                options={!!inputAttributes && !!inputAttributes['options'] ? inputAttributes['options'] : []}
                classes={!!classes && !!classes['input-component'] ? classes['input-component'] : []}
                inputAttributes={!!inputAttributes && !!inputAttributes['attributes'] ? inputAttributes['attributes'] : []}
                onChange={onChange}
            />
        );
    } else if (!!type && type === "searchable-select") {
        inputComponent = (
            <SearchableSelect
                name={name}
                required={required}
                value={value}
                options={!!inputAttributes && !!inputAttributes['options'] ? inputAttributes['options'] : []}
                classes={!!classes && !!classes['input-component'] ? classes['input-component'] : []}
                inputAttributes={!!inputAttributes && !!inputAttributes['attributes'] ? inputAttributes['attributes'] : []}
                onChange={onChange}
            />
        );
    } else if (!!type && type === "file-uploader") {
        // TODO - Include
    } else if (!!type && type === "image-uploader") {
        // TODO - Include
    } else {
        inputComponent = (
            <BasicInput
                name={name}
                required={required}
                value={value}
                classes={!!classes && !!classes['input-component'] ? classes['input-component'] : []}
                inputAttributes={!!inputAttributes && !!inputAttributes['attributes'] ? inputAttributes['attributes'] : []}
                onChange={onChange}
                type={type}
            />
        );
    }

    if (!!error) {
        errorComponent = (
            <Error
                classes={!!classes && !!classes['error-component'] ? classes['error-component'] : []}
                error={error}
            />
        );
    }

    return (
        <div className={processedClasses['container']}>
            {labelComponent}
            {!!description  && (
                <div className={processedClasses['description']}>
                    {description}
                </div>
            )}
            <div className={processedClasses['input-container']}>
                {inputComponent}
            </div>
            {errorComponent}
        </div>
    );
}

export default FormInput;