import React, { useState, useEffect } from "react";
import axios from "axios";
import "bootstrap/dist/css/bootstrap.min.css";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faEye, faEdit, faTrash } from "@fortawesome/free-solid-svg-icons";

library.add(faEye, faEdit, faTrash);



const ListadoResoluciones = () => {
    const [resoluciones, setResoluciones] = useState([]);
    const [oficinas, setOficinas] = useState([]);
    const [tipos, setTipos] = useState([]);
    const [estatus, setEstatus] = useState([]);
    const [busqueda, setBusqueda] = useState(""); 

    
    const [oficinaSeleccionada, setOficinaSeleccionada] = useState("Todos");
    const [tipoSeleccionado, setTipoSeleccionado] = useState("Todos");
    const [estatusSeleccionado, setEstatusSeleccionado] = useState("Todos");
    
    const [currentPage, setCurrentPage] = useState(1);
    const [totalPages, setTotalPages] = useState(1);
    const perPage = 10;

    const resolucionesFiltradas = resoluciones.filter((resolucion) =>
        resolucion.titulo.toLowerCase().includes(busqueda.toLowerCase())
    );

    useEffect(() => {
        fetchOficinas();
        fetchTipos();
        fetchEstatus();
        fetchResoluciones();
    }, [oficinaSeleccionada, tipoSeleccionado, estatusSeleccionado, currentPage]);

    const fetchOficinas = async () => {
        const response = await axios.get(`/api/delegaciones/1`);
        setOficinas([{ id: "Todos", nombre: "Todas" }, ...response.data]);
    };

    const fetchTipos = () => {
        setTipos([
            { id: "Todos", nombre: "Todos" },
            { id: "1", nombre: "Reposición de asientos" },
            { id: "2", nombre: "Traspaso de folios" }
        ]);
    };

    const fetchEstatus = () => {
        setEstatus([
            { id: "Todos", nombre: "Todos" },
            { id: "1", nombre: "En Análisis" },
            { id: "2", nombre: "En Análisis por Dirección Jurídica" },
            { id: "3", nombre: "Aprobadas" }
        ]);
    };

    const getBadgeClass = (tipo) => {
        switch (tipo) {
            case "1":
                return "bg-primary"; 
            case "2":
                return "bg-success"; // Verde
            default:
                return "bg-secondary"; // Gris
        }
    };

    const getBadgeText = (tipo) => {
        switch (tipo) {
            case "1":
                return "Reposición de asientos";
            case "2":
                return "Traspaso de folios";
            default:
                return "Desconocido";
        }
    };
    
    const getBadgeClassEtapas = (estado) => {
        switch (estado) {
            case "0":
                return "bg-warning"; 
            case "2":
                return "bg-primary"; 
            case "1":
                return "bg-success"; // Verde
            default:
                return "bg-secondary"; // Gris
        }
    };
    
    const getBadgeTextEtapas = (estado) => {
        switch (estado) {
            case "0":
                return "En Revisión";
            case "1":
                return "Aprobada";
            case "2":
                return "En Revisión por Dirección Jurídica";
            default:
                return "Desconocido";
        }
    };

    const getBadgeClassOficina = (oficina) => {
        switch (oficina) {
            case "1":
                return "bg-success"; 
            case "2":
                return "bg-success";
            case "3":
                return "bg-success";
            case "4":
                return "bg-success"; // Verde
            default:
                return "bg-secondary"; // Gris
        }
    };
    
    const getBadgeTextOficina = (oficina) => {
        switch (oficina) {
            case "1":
                return "Othón P. Blanco"; 
            case "2":
                return "Solidaridad";
            case "3":
                return "Benito Júarez";
            case "4":
                return "Cozumel"; // Verde
            default:
                return "bg-secondary"; // Gris
        }
    };

    const fetchResoluciones = async () => {
        try {
            const response = await axios.get("/api/listado-resoluciones", {
                params: {
                    oficina_id: oficinaSeleccionada,
                    tipo: tipoSeleccionado,
                    estatus: estatusSeleccionado,
                    page: currentPage,
                    per_page: perPage
                },
            });
            setResoluciones(response.data.data);
            setTotalPages(response.data.last_page);
        } catch (error) {
            console.error("Error al obtener resoluciones", error);
        }
    };

    return (
        <div className="container mt-4">
            {/* Filtros y barra de búsqueda */}
            <div className="card p-3 mb-4">
                <div className="row g-3">
                    <div className="col-md-4">
                        <label className="form-label">Oficina:</label>
                        <select className="form-select" value={oficinaSeleccionada} onChange={(e) => setOficinaSeleccionada(e.target.value)}>
                            {oficinas.map((oficina) => (
                                <option key={oficina.id} value={oficina.id}>{oficina.nombre}</option>
                            ))}
                        </select>
                    </div>
                    <div className="col-md-4">
                        <label className="form-label">Tipo:</label>
                        <select className="form-select" value={tipoSeleccionado} onChange={(e) => setTipoSeleccionado(e.target.value)}>
                            {tipos.map((tipo) => (
                                <option key={tipo.id} value={tipo.id}>{tipo.nombre}</option>
                            ))}
                        </select>
                    </div>
                    <div className="col-md-4">
                        <label className="form-label">Estatus:</label>
                        <select className="form-select" value={estatusSeleccionado} onChange={(e) => setEstatusSeleccionado(e.target.value)}>
                            {estatus.map((estatus) => (
                                <option key={estatus.id} value={estatus.id}>{estatus.nombre}</option>
                            ))}
                        </select>
                    </div>
                    <div className="col-md-12">
                    <div className="input-group">
                            <input
                                type="text"
                                className="form-control"
                                placeholder="Buscar por título..."
                                value={busqueda}
                                onChange={(e) => setBusqueda(e.target.value)} 
                            />
                            <button className="btn btn-primary" onClick={() => setCurrentPage(1)}>
                                Buscar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    
            {/* Tabla con resoluciones */}
            <div className="table-responsive">
                <table className="table table-striped table-bordered">
                    <thead className="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Delegación</th>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {resolucionesFiltradas.map((resolucion) => (
                            <tr key={resolucion.resolucion_id}>
                                <td>{resolucion.resolucion_id}</td>
                                <td>
                                    <span className={`badge ${getBadgeClassOficina(resolucion.oficina_dest)}`}>
                                    {getBadgeTextOficina(resolucion.oficina_dest)}
                                     </span>
                                </td>
                                <td>{resolucion.titulo}</td>
                                <td>
                                    <span className={`badge ${getBadgeClass(resolucion.tipo)}`}>
                                    {getBadgeText(resolucion.tipo)}
                                     </span>
                                </td>

                                <td>
                                    <span className={`badge ${getBadgeClassEtapas(resolucion.estatus)}`}>
                                        {getBadgeTextEtapas(resolucion.estatus)}
                                    </span>
                                </td>
                                <td>
                                        <a className="btn btn-info" href={`/resolucion/${resolucion.resolucion_id}`}>
                                        <FontAwesomeIcon icon="eye" style={{ color: "white" }} />
                                        </a>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
    
            {/* Paginación */}
            <nav className="pagination-container mt-4">
                {/* Números de página arriba */}
                <ul className="pagination justify-content-center">
                    {[...Array(totalPages).keys()].map((num) => (
                        <li key={num + 1} className={`page-item ${currentPage === num + 1 ? 'active' : ''}`}>
                            <button className="page-link" onClick={() => setCurrentPage(num + 1)}>{num + 1}</button>
                        </li>
                    ))}
                </ul>
    
                {/* Botones de navegación abajo */}
                <div className="d-flex justify-content-center mt-3">
                    <button 
                        className="btn btn-info mx-2" 
                        onClick={() => setCurrentPage(currentPage - 1)}
                        disabled={currentPage === 1}
                    >
                        Anterior
                    </button>
    
                    <button 
                        className="btn btn-info mx-2" 
                        onClick={() => setCurrentPage(currentPage + 1)}
                        disabled={currentPage === totalPages}
                    >
                        Siguiente
                    </button>
                </div>
            </nav>
        </div>
    );
};    
export default ListadoResoluciones;

