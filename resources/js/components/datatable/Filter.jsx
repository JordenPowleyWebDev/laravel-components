import React from 'react';

const Filter = (props) => {
    const {
        label       = null,
        value       = "",
        options     = [],
        name        = "filter_input",
        onChange    = () => {},
        classes     = {},
    } = props;

    const nodes = ['container', 'label', 'select'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-data-table-filter-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['data-table']['filter'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    return (
        <div className={processedClasses.container}>
            {!!label && (
                <label
                    htmlFor={name}
                    className={processedClasses.label}
                >
                    {label}
                </label>
            )}
            <select
                name={name}
                id={name}
                className={processedClasses.select}
                onChange={(event) => onChange(event.target.value)}
                value={value}
            >
                {!!options && options.map((item, key) => (
                    <option key={key} value={item.value}>{item.name}</option>
                ))}
            </select>
        </div>
    );
}

export default Filter;