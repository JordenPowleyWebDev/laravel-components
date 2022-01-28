import React from 'react';

export default function EmptyTable(props) {
    const {
        itemName,
        classes     = {}
    } = props;

    const nodes = ['container', 'icon'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-data-table-empty-table-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['data-table']['empty-table'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    return (
        <div className={processedClasses.container}>
            <i className={processedClasses.icon} /> No {itemName || 'items'} found
        </div>
    );
}