import React, {useState} from 'react';
import ReactDOM from "react-dom";
import {toast} from "react-toastify";

const Toasts = (props) => {
    let {
        type    = "error",
        content,
    } = props;

    const processedContent = (JSON.parse(content)['messages'])
        .join('\n');

    switch (type) {
        case 'info':
            toast.info(<div>{processedContent}</div>);
            break;
        case 'success':
            toast.success(<div>{processedContent}</div>);
            break;
        case 'error':
            toast.error(<div>{processedContent}</div>);
            break;
    }

    return null;
}
export default Toasts;

document.querySelectorAll('.blade-toast').forEach(
    (container) => {
        if (container) {
            ReactDOM.render(<Toasts{...container.dataset} />, container);
        }
    }
);