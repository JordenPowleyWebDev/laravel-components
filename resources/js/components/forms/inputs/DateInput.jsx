import React, {useState, useEffect} from 'react';
import {addDays, startOfDay, format, parse} from "date-fns";
import DatePicker from "react-datepicker";
import {DATE_FORMATS} from "../../../constants/DateFormats";

const DateInput = (props) => {
    const {
        classes         = {},
        name            = '',
        required        = false,
        error           = false,
        value           = '',
        inputAttributes = [],
        onChange        = (value) => {},
        disabled        = false,
    } = props;

    const nodes = ['outer', 'container'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-form-inputs-date-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['form']['inputs']['date'][node];

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

    const parseDate = () => {
        if (!value || value === "") {
            return "";
        }

        return parse(value, DATE_FORMATS.DB_DATE, startOfDay(new Date()));
    }

    const handleUpdate = (newValue) => {
        if (!newValue || newValue === "") {
            onChange(null);
        } else {
            onChange(format(newValue, DATE_FORMATS.DB_DATE));
        }
    }

    return (
        <div className={processedClasses.outer}>
            <DatePicker
                {...inputAttributes}
                selected={parseDate()}
                name={name}
                dateFormat={DATE_FORMATS.DATE}
                onChange={(newValue) => handleUpdate(newValue)}
                showMonthDropdown
                showYearDropdown
                dropdownMode={"select"}
                current
                isClearable={!!inputAttributes && !!inputAttributes.clearable && !(!value || value === "")}
                closeOnScroll={true}
                showPopperArrow={false}
                className={getContainerClasses()}
                disabled={disabled}
                disabledKeyboardNavigation
                required={required}
            />
        </div>
    );
}

export default DateInput;
