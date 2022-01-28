import React, { useState, useEffect } from 'react';

export default function Debounce (func, timeout = 500) {
    let timer;

    return (...args) => {
        clearTimeout(timer);

        timer = setTimeout(() => {
            func.apply(this, args);
        }, timeout);
    };
}