import React from 'react';

/**
 * Button::BUTTON_TYPES
 * @type {{SUBMIT: string, HREF: string, ON_CLICK: string, MODAL: string}}
 */
const BUTTON_TYPES = {
    SUBMIT:     "submit",
    HREF:       "href",
    ON_CLICK:   "on_click",
    MODAL:      "modal",
}

const Button = (props) => {
    const {
        type,
        label,
        classes = [],
        options = null,
    } = props;

    const renderIcon = () => {
        let icon = !!options && !!options.icon ? options.icon : null;

        if (!icon) {
            return null;
        }

        return (
            <i className={classes.icon+" "+icon} />
        )
    }

    const renderHrefButton = (href, target) => (
        <a
            href={href}
            target={target}
            className={classes.container}
        >
            {renderIcon()}
            <span className={classes.label}>
                {label}
            </span>
        </a>
    )

    const renderModalButton = (modal) => (
        <button
            onClick={jQuery('#'+modal).modal('show')}
            className={classes.container}
        >
            {renderIcon()}
            <span className="classes.label">
                {label}
            </span>
        </button>
    )

    const renderOnClickButton = (onClick) => (
        <button
            type="button"
            className={classes.container}
            onClick={onClick}
        >
            {renderIcon()}
            <span className={classes.label}>
                {label}
            </span>
        </button>
    )

    const renderSubmitButton = (form) => (
        <button
            type="submit"
            className={classes.container}
            form={form}
        >
            {renderIcon()}
            <span className={classes.label}>
                {label}
            </span>
        </button>
    )

    switch (type) {
        case BUTTON_TYPES.HREF:
            return renderHrefButton(
                !!options && !!options.href ? options.href : "",
                !!options && !!options.target ? options.target : null
            );
        case BUTTON_TYPES.MODAL:
            return renderModalButton(
                !!options && !!options.modal ? options.modal : ""
            );
        case BUTTON_TYPES.ON_CLICK:
            return renderOnClickButton(
                !!options && !!options.on_click ? options.on_click : () => {}
            );
        case BUTTON_TYPES.SUBMIT:
            return renderSubmitButton(
                !!options && !!options.form ? options.form : null
            );
    }
}

export default Button;