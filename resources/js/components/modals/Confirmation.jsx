import React from 'react';
import Modal from 'react-modal';

const Confirmation = (props) => {
    const {
        title,
        confirmationText,
        show                    = false,
        parentId                = "",
        id                      = "confirmation-modal",
        disabled                = false,
        onCancel                = () => {},
        onConfirm               = () => {},
        cancellationButtonText  = "Cancel",
        confirmationButtonText  = "Confirm",
        classes                 = {},
    } = props;

    const nodes = ['react-container', 'modal-dialog', 'form', 'modal-content', 'modal-header', 'modal-title', 'modal-body', 'confirmation-text', 'modal-footer', 'confirmation-button', 'cancel-button'];
    const processedClasses = {};
    nodes.forEach((node) => {
        let itemClass = window.laravelComponents['views-namespace']+"-modals-confirmation-"+node;
        processedClasses[node] = itemClass+" "+window.laravelComponents['default-classes']['components']['modals']['confirmation'][node];

        if (!!classes && !!classes[node]) {
            processedClasses[node] += " "+classes[node];
        }
    });

    const handleSubmit = () => {
        onConfirm();
    }

    const handleClose = () => {
        if (!disabled) {
            onCancel();
        }
    }

    return (
        <Modal
            ariaHideApp={false}
            isOpen={show}
            parentSelector={() => document.getElementById(parentId)}
            onRequestClose={() => handleClose()}
            contentLabel={title}
            className={classes['react-container']}
            style={{
                overlay: {
                    width: '100vw',
                    height: '100vh',
                    display: 'flex',
                    justifyContent: 'center',
                    alignItems: 'center',
                    backgroundColor: 'rgba(0, 0, 0, 0.6)',
                    overflow: 'hidden',
                    outline: 'none',
                },
                content: {
                    width: "100%",
                    height: "100%",
                    padding: 0,
                    border: 0,
                    outline: 'none',
                },
            }}
        >
            <div className={classes['modal-content']} id={id}>
                <div className={classes['modal-dialog']}>
                    <div className={classes['form']}>
                        <div className={classes['modal-content']}>
                            <div className={classes['modal-header']}>
                                <h5 className={classes['modal-title']} id={{id}+"-label"}>{title}t</h5>
                            </div>
                            <div className={classes['modal-body']}>
                                <p className={classes['confirmation-text']}>
                                    {confirmationText}
                                </p>
                            </div>
                            <div className={classes['modal-footer']}>
                                <button
                                    type="button"
                                    className={classes['cancel-button']}
                                    onClick={() => handleClose()}
                                >
                                    {cancellationButtonText}
                                </button>
                                <button
                                    type="submit"
                                    className={classes['confirmation-button']}
                                    onClick={() => handleSubmit()}
                                >
                                    {confirmationButtonText}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Modal>
    );
}

export default Confirmation;