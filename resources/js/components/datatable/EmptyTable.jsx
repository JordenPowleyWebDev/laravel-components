import React from 'react';

export default function EmptyTable({ itemName }) {
    return (
        <div className="w-100 text-center bg-white p-2 rounded user-select-none">
            <i className="text-secondary" /> No {itemName || 'items'} found
        </div>
    );
}