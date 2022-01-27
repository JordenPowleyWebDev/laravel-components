import React from 'react';

const Card = (props) => {
    const {
        classes     = {},
        children    = null
    } = props;

    const nodes = ['container', 'inner'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-layout-card-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['layout']['card'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    return (
        <div className={processedClasses.container}>
            <div className={processedClasses.inner}>
                {children}
            </div>
        </div>
    )
}

export default Card;