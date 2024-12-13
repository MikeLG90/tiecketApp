import React, { useState, useEffect } from 'react';
import axios from 'axios';
import Tabs from './Tabs';
import TicketList from './TicketList';
import TicketModal from './TicketModal';

function TicketApp() {
    const [estado, setEstado] = useState(1); // Estado por clave numérica
    const [tickets, setTickets] = useState([]);
    const [selectedTicket, setSelectedTicket] = useState(null);

    // Fetch de tickets filtrados por estado clave
    useEffect(() => {
        axios.get('/api/tickets?estado=${estado}')
            .then(response => setTickets(response.data))
            .catch(error => console.error(error));
    }, [estado]);

    const handleShowDetails = (ticket) => {
        setSelectedTicket(ticket);
    };

    const handleCloseModal = () => {
        setSelectedTicket(null);
    };

    return (
        <div className="container mt-4">
            <h2 className="text-center mb-4">Sistema de Tickets RPPC</h2>
            <Tabs estado={estado} setEstado={setEstado} />
            <TicketList tickets={tickets} onShowDetails={handleShowDetails} />
            {selectedTicket && (
                <TicketModal ticket={selectedTicket} onClose={handleCloseModal} />
            )}
        </div>
    );
}

export default TicketApp;