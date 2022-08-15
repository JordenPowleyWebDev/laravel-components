import React from 'react';
import Select from 'react-select'

const SearchableSelect = (props) => {
    const {
        classes         = {},
        name            = '',
        required        = false,
        error           = false,
        options         = [],
        value           = '',
        inputAttributes = [],
        onChange        = (value) => {},
        disabled        = false
    } = props;

    const nodes = ['container'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-form-inputs-searchable-select-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['form']['inputs']['searchable-select'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    const getContainerClasses = () => {
        if (!error) {
            return processedClasses.container;
        }

        return processedClasses + ' ' + window.laravelComponents['default-classes']['components']['form']['inputs']['input']['invalid'];
    }

    const stringToTitleCase = (value) => {
        return value.replace(
            /\w\S*/g,
            (txt) => {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            }
        );
    }

    const extractValue = () => {
        if (!value || value === "" || !options || options.length <= 0) {
            return "";
        }

        for (let i = 0; i < options.length; i++) {
            if (options[i].value === value) {
                return options[i];
            }
        }

        return "";
    }

    let isMulti = !!inputAttributes && !!inputAttributes.isMulti;


    return (
        <Select
            {...inputAttributes}
            id={name}
            name={name}
            className={getContainerClasses()}
            required={required}
            value={isMulti ? value : extractValue()}
            onChange={(item) => onChange(isMulti ? item : item.value)}
            isDisabled={disabled}
            menuPlacement={'auto'}
            options={options}
            isMulti={isMulti}
            isSearchable={true}
         />
    );
}

export default SearchableSelect;