import React from 'react';

function TicketList({ tickets, onShowDetails }) {
    return (
        <div className="list-group">
            {tickets.map(ticket => (
                <button
                    key={ticket.id}
                    className="list-group-item list-group-item-action"
                    onClick={() => onShowDetails(ticket)}
                >
                    <h5 className="mb-1">{ticket.titulo}</h5>
                    <small className="text-muted">{ticket.fecha_creacion}</small>
                    <p className="mb-1">{ticket.descripcion.slice(0, 50)}...</p>
                </button>
            ))}
        </div>
    );
}

export default TicketList;