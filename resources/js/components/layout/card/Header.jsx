import React from 'react';

const Header = (props) => {
    const {
        classes     = {},
        title       = null,
        children    = null
    } = props;

    const nodes = ['container', 'title'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-layout-card-header-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['layout']['card-header'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    return (
        <div className={processedClasses.container}>
            {!!title && (
                <h1 className={processedClasses.title}>{title}</h1>
            )}
            {!!children ? children : null}
        </div>
    )
}

export default Header;