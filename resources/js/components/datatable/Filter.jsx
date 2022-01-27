import React from 'react';

const Filter = (props) => {
    const {
        label           = null,
        value           = "",
        options         = [],
        name            = "filter_input",
        onChange        = () => {},
        classes         = "",
        inputClasses    = "m-0 p-1 px-2"
    } = props;

    return (
        <div className={"filter-input "+classes}>
            {!!label && (
                <label
                    htmlFor={name}
                    className={"m-0 mr-2"}
                >
                    {label}
                </label>
            )}
            <select
                name={name}
                id={name}
                className={inputClasses}
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