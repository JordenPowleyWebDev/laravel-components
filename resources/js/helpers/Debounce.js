let DEBOUNCE;

/**
 *
 * Debounce::debounce()
 *
 * @param callback
 * @param timeout
 */
export default function debounce (callback, timeout = 500) {
    clearTimeout(DEBOUNCE);
    DEBOUNCE = setTimeout(() => {
        callback()
    }, timeout);
}
