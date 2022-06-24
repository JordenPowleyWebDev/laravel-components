import React from 'react';

const Select = (props) => {
    const {
        classes         = {},
        name            = '',
        required        = false,
        error           = false,
        options         = [],
        value           = '',
        inputAttributes = [],
        onChange        = (value) => {}
    } = props;

    const nodes = ['container'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-form-inputs-select-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['form']['inputs']['select'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    const getContainerClasses = () => {
        if (!error) {
            return processedClasses.container;
        }

        return processedClasses + ' ' + window.laravelComponents['default-classes']['components']['form']['inputs']['input']['invalid'];
    }

    const stringToTitleCase = (value) => {
        return value.replace(
            /\w\S*/g,
            (txt) => {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            }
        );
    }

    return (
        <select
            id={name}
            name={name}
            className={getContainerClasses()}
            required={required}
            value={value}
            onChange={(event) => onChange(event.target.value)}
            {...inputAttributes}
        >
            {!!inputAttributes && !!inputAttributes.placeholder && (
                <option value={null}>{inputAttributes.placeholder}</option>
            )}
            {!!options && options.length > 0 && options.map((item) => {
                return (
                    <option
                        key={item.value}
                        value={item.value}
                    >
                        {stringToTitleCase(item.label)}
                    </option>
                );
            })}
        </select>
    );
}

export default Select;