import.meta.glob([
    '../images/**',
]);

//import Mailbox from './components/Mailbox';
/*import React from 'react';
import ReactDOM from 'react-dom/client'; // Asegúrate de importar desde 'react-dom/client'
import TicketApp from './components/TicketApp.jsx'; // Asegúrate de que la ruta sea correcta

const root = ReactDOM.createRoot(document.getElementById('ticketApp'));
root.render(<TicketApp />);*/

import React from 'react';
import ReactDOM from 'react-dom/client';
import ListadoFolios from './components/ListadoFolios';

if (document.getElementById('listado-folios')) {
    const root = ReactDOM.createRoot(document.getElementById('listado-folios'));
    root.render(
        <React.StrictMode>
            <ListadoFolios />
        </React.StrictMode>
    );
}