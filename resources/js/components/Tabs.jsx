import React from 'react';

function Tabs({ estado, setEstado }) {
    // Claves de estados
    const estados = [
        { label: 'Enviado', value: 1 },
        { label: 'Procesando', value: 2 },
        { label: 'Resuelto', value: 3 },
    ];

    return (
        <ul className="nav nav-tabs mb-3">
            {estados.map(e => (
                <li className="nav-item" key={e.value}>
                    <button
                        className={`nav-link ${estado === e.value ? 'active' : ''}`}
                        onClick={() => setEstado(e.value)}
                    >
                        {e.label}
                    </button>
                </li>
            ))}
        </ul>
    );
}

export default Tabs;
