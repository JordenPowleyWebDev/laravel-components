import React from 'react';

const Label = (props) => {
    const {
        classes     = {},
        type        = null,
        name        = '',
        label       = '',
        required    = false,
    } = props;

    const nodes = ['container'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-form-label-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['form']['label'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    if (required) {
        processedClasses.container = processedClasses.container + ' required';
    }

    if (!type || (!!type && !['file'].includes(type))) {
        return (
            <label
                htmlFor={name}
                className={processedClasses.container}
            >
                {label}
            </label>
        );
    }

    return (
        <div className={processedClasses.container}>
            {label}
        </div>
    );
}

export default Label;