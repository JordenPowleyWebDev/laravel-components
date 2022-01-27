import React from 'react';

const SearchInput = (props) => {
    const {
        value = "",
        placeholder = "Search...",
        onChange = () => { },
        onSearch = () => { },
        classes = "",
    } = props;

    return (
        <div className={"search-input " + classes}>
            <input
                type="text"
                name="search_input"
                className={"m-0 p-2"}
                placeholder={placeholder}
                value={value}
                onChange={(event) => onChange(event.target.value)}
            />
            <button
                className={"m-0 p-2"}
                onClick={() => onSearch()}
            >
                <i className={"fal fa-search fa-fw"} />
            </button>
        </div>
    );
}

export default SearchInput;