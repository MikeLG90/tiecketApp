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
import ListadoResoluciones from './components/ListadoResoluciones';
import ListadoResolucionesE from './components/ListadoResolucionesE';
import ListadoResolucionesP from './components/ListadoResolucionesP';
import ListadoResolucionesA from './components/ListadoResolucionesA';




if (document.getElementById('listado-folios')) {
    const root = ReactDOM.createRoot(document.getElementById('listado-folios'));
    root.render(
        <React.StrictMode>
            <ListadoFolios />
        </React.StrictMode>
    );
}
if (document.getElementById('listado-resoluciones')) {
    const root = ReactDOM.createRoot(document.getElementById('listado-resoluciones'));
    root.render(
        <React.StrictMode>
            <ListadoResoluciones />
        </React.StrictMode>
    );
}

if (document.getElementById('listado-resolucionesE')) {
    const root = ReactDOM.createRoot(document.getElementById('listado-resolucionesE'));
    root.render(
        <React.StrictMode>
            <ListadoResolucionesE />
        </React.StrictMode>
    );
}

if (document.getElementById('listado-resolucionesA')) {
    const root = ReactDOM.createRoot(document.getElementById('listado-resolucionesA'));
    root.render(
        <React.StrictMode>
            <ListadoResolucionesA />
        </React.StrictMode>
    );
}

if (document.getElementById('listado-resolucionesP')) {
    const root = ReactDOM.createRoot(document.getElementById('listado-resolucionesP'));
    root.render(
        <React.StrictMode>
            <ListadoResolucionesP />
        </React.StrictMode>
    );
}