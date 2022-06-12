import React from 'react';

const BasicInput = (props) => {
    const {
        classes         = {},
        name            = '',
        type            = 'text',
        required        = false,
        error           = false,
        value           = '',
        inputAttributes = [],
        onChange        = (value) => {}
    } = props;

    const nodes = ['container'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-form-inputs-input-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['form']['inputs']['basic-input'][node];

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

    return (
        <input
            id={name}
            name={name}
            type={type}
            className={getContainerClasses()}
            required={required}
            value={value}
            onChange={(event) => onChange(event.target.value)}
            {...inputAttributes}
        />
    );
}

export default BasicInput;