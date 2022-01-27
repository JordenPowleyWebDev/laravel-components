import React from 'react';

const Data = (props) => {
    const {
        classes     = {},
        data        = []
    } = props;

    const nodes = ['container', 'column', 'label', 'value'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-layout-card-data-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['layout']['card-data'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    return (
        <div className={processedClasses.container}>
            {!!data && data.length > 0 && data.map((item, index) => (
                <div className={processedClasses.column} key={index}>
                    <div className={processedClasses.label}>{item.label}</div>
                    <div className={processedClasses.value}>{!!item.value ? item.value : window.laravelComponents['empty-value']}</div>
                </div>
            ))}
        </div>
    )
}

export default Data;