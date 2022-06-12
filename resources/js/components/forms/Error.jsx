import React from 'react';

const Error = (props) => {
    const {
        classes = {},
        error   = '',
    } = props;

    const nodes = ['container'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-form-error-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['form']['error'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    return (
        <span className={processedClasses.container} role="alert">
            <strong>{error}</strong>
        </span>
    );
}

export default Error;