import React, {useState} from 'react';
import FormInput from "./FormInput";
import * as ReactDOM from "react-dom";
import {parse} from "date-fns";
import {DATE_FORMATS} from "../../constants/DateFormats";

const BladeInput = (props) => {
    let {
        value   = "",
        type    = "text"
    } = props;

    if (type === "date" && !!value && value !== "") {
        value = parse(value, DATE_FORMATS.DB_DATE, new Date());
    }

    const processBooleanProp = (key) => {
        let propValue = false;

        if (!!props && !!props[key]) {
            if (props[key] === "true" || props[key] === "1" || props[key] === 1) {
                propValue = true;
            }
        }

        return propValue;
    }

    const processJsonProp = (key) => {
        let options = null;
        if (!!props && !!props[key]) {
            options = JSON.parse(props[key]);
        }

        return options;
    }

    const hydrateMultiValues = (values) => {
        const hydrated = [];

        const options = processJsonProp('options');

        for (let valueIndex = 0; valueIndex < values.length; valueIndex++) {
            for (let optionIndex = 0; optionIndex < options.length; optionIndex++) {
                if (values[valueIndex] === options[optionIndex]['value']) {
                    hydrated.push(options[optionIndex]);
                    break;
                }
            }
        }

        return hydrated;
    }

    const processInitialValue = () => {
        if (processBooleanProp('isMulti')) {
            let arrayValue = processJsonProp('value');

            if (!!arrayValue) {
                return hydrateMultiValues(arrayValue);
            }

            return [];
        } else {
            return value;
        }
    }

    const [inputValue, setInputValue] = useState(processInitialValue());

    return (
        <FormInput
            {...props}
            value={inputValue}
            onChange={(inputValue) => setInputValue(inputValue)}
            required={processBooleanProp('required')}
            options={processJsonProp('options')}
            isMulti={processBooleanProp('isMulti')}
            inputAttributes={processJsonProp('inputAttributes')}
        />
    )
}

export default BladeInput;

document.querySelectorAll('.blade-input').forEach(
    (container) => {
        if (container) {

            ReactDOM.render(
                <BladeInput
                    {...container.dataset}
                />,
                container
            );
        }
    }
);
