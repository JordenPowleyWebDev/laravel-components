import ReactDOM from "react-dom";
import {ToastContainer} from "react-toastify";
import React from "react";
import 'react-toastify/dist/ReactToastify.min.css';

ReactDOM.render(
    <ToastContainer
        theme="colored"
        position="top-right"
        autoClose={5000}
        hideProgressBar={false}
        newestOnTop={false}
        closeOnClick
        rtl={false}
        pauseOnFocusLoss
        draggable
        pauseOnHover
    />
, document.getElementById('toast-container'));