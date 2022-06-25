import React from 'react';

const Textarea = (props) => {
    const {
        classes         = {},
        name            = '',
        required        = false,
        error           = false,
        value           = '',
        inputAttributes = [],
        onChange        = (value) => {}
    } = props;

    const nodes = ['container'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-form-inputs-textarea-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['form']['inputs']['textarea'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    const getContainerClasses = () => {
        if (!error) {
            return processedClasses.container;
        }

        return processedClasses + ' ' + window.laravelComponents['default-classes']['components']['form']['inputs']['textarea']['invalid'];
    }

    return (
        <textarea
            id={name}
            name={name}
            className={getContainerClasses()}
            required={required}
            value={value}
            onChange={(event) => onChange(event.target.value)}
            {...inputAttributes}
        >{value}</textarea>
    );
}

export default Textarea;