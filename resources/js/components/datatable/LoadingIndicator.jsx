import React from 'react';

export default function LoadingIndicator(props) {
    const {
        classes = {}
    } = props;

    const nodes = ['container', 'icon'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-data-table-loading-indicator-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['data-table']['loading-indicator'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    return (
        <div className={processedClasses.container}>
            <i className={processedClasses.icon} /> Loading
        </div>
    );
}