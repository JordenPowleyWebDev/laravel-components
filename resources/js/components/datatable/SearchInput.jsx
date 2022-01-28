import React from 'react';

const SearchInput = (props) => {
    const {
        value       = "",
        placeholder = "Search...",
        onChange    = () => {},
        onSearch    = () => {},
        classes     = {},
    } = props;

    const nodes = ['container', 'input', 'button', 'button-icon'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-data-table-search-input-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['data-table']['search-input'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    return (
        <div className={processedClasses['container']}>
            <input
                type="text"
                name="search_input"
                className={processedClasses['input']}
                placeholder={placeholder}
                value={value}
                onChange={(event) => onChange(event.target.value)}
            />
            <button
                className={processedClasses['button']}
                onClick={() => onSearch()}
            >
                <i className={processedClasses['button-icon']} />
            </button>
        </div>
    );
}

export default SearchInput;