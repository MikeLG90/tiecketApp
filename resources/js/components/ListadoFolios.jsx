import React, { useState, useEffect } from 'react';
import axios from 'axios';

const ListadoFolios = () => {
    const [folios, setFolios] = useState([]);
    const [cabezasSector, setCabezasSector] = useState([]);
    const [dependencias, setDependencias] = useState([]);
    const [delegaciones, setDelegaciones] = useState([]);
    const [areas, setAreas] = useState([]);
    const [cabezaSectorSeleccionada, setCabezaSectorSeleccionada] = useState('Todas');
    const [dependenciaSeleccionada, setDependenciaSeleccionada] = useState('Todas');
    const [delegacionSeleccionada, setDelegacionSeleccionada] = useState('Todas');
    const [areaSeleccionada, setAreaSeleccionada] = useState('Todas');
    const [busqueda, setBusqueda] = useState('');
    const [currentPage, setCurrentPage] = useState(1);
    const [totalPages, setTotalPages] = useState(0);
    const [perPage, setPerPage] = useState(10);

    useEffect(() => {
        fetchCabezasSector();
        fetchFolios();
    }, []);

    useEffect(() => {
        if (cabezaSectorSeleccionada !== 'Todas') {
            fetchDependencias(cabezaSectorSeleccionada);
        } else {
            setDependencias([]);
            setDependenciaSeleccionada('Todas');
        }
        setCurrentPage(1);
        fetchFolios();
    }, [cabezaSectorSeleccionada]);

    useEffect(() => {
        if (dependenciaSeleccionada !== 'Todas') {
            fetchDelegaciones(dependenciaSeleccionada);
        } else {
            setDelegaciones([]);
            setDelegacionSeleccionada('Todas');
        }
        setCurrentPage(1);
        fetchFolios();
    }, [dependenciaSeleccionada]);

    useEffect(() => {
        if (delegacionSeleccionada !== 'Todas') {
            fetchAreas(delegacionSeleccionada);
        } else {
            setAreas([]);
            setAreaSeleccionada('Todas');
        }
        setCurrentPage(1);
        fetchFolios();
    }, [delegacionSeleccionada]);

    useEffect(() => {
        setCurrentPage(1);
        fetchFolios();
    }, [areaSeleccionada, busqueda, perPage]);

    useEffect(() => {
        fetchFolios();
    }, [currentPage]);

    const fetchCabezasSector = async () => {
        const response = await axios.get('/api/cabezas-sector');
        setCabezasSector([{ id: 'Todas', nombre: 'Todas' }, ...response.data]);
    };

    const fetchDependencias = async (cabezaSectorId) => {
        const response = await axios.get(`/api/dependencias/${cabezaSectorId}`);
        setDependencias([{ id: 'Todas', nombre: 'Todas' }, ...response.data]);
    };

    const fetchDelegaciones = async (dependenciaId) => {
        const response = await axios.get(`/api/delegaciones/${dependenciaId}`);
        setDelegaciones([{ id: 'Todas', nombre: 'Todas' }, ...response.data]);
    };

    const fetchAreas = async (delegacionId) => {
        const response = await axios.get(`/api/areas/${delegacionId}`);
        setAreas([{ id: 'Todas', nombre: 'Todas' }, ...response.data]);
    };

    const fetchFolios = async () => {
        const response = await axios.get('/api/folios', {
            params: {
                cabeza_sector_id: cabezaSectorSeleccionada,
                dependencia_id: dependenciaSeleccionada,
                delegacion_id: delegacionSeleccionada,
                area_id: areaSeleccionada,
                busqueda: busqueda,
                page: currentPage,
                per_page: perPage
            }
        });
        setFolios(response.data.data);
        setTotalPages(response.data.last_page);
    };

    const handlePageChange = (page) => {
        setCurrentPage(page);
    };

    const renderPagination = () => {
        const pages = [];
        for (let i = 1; i <= totalPages; i++) {
            pages.push(
                <li key={i} className={`page-item ${currentPage === i ? 'active' : ''}`}>
                    <button className="page-link" onClick={() => handlePageChange(i)}>{i}</button>
                </li>
            );
        }
        return (
            <nav aria-label="Page navigation">
                <ul className="pagination justify-content-center">
                    <li className={`page-item ${currentPage === 1 ? 'disabled' : ''}`} style={{ marginRight: '380px' }}>
                        <button className="page-link" onClick={() => handlePageChange(currentPage - 1)}>Anterior</button>
                    </li>
                    {pages}
                    <li className={`page-item ${currentPage === totalPages ? 'disabled' : ''}`} style={{ marginLeft: '380px' }}>
                        <button className="page-link" onClick={() => handlePageChange(currentPage + 1)}>Siguiente</button>
                    </li>
                </ul>
            </nav>
        );
    };
    
    return (
        <div className="container mt-4">
            <div className="row mb-4">
                <div className="col-md-3 mb-3">
                    <label htmlFor="">Cabeza de sector</label>
                    <select
                        className="form-select"
                        value={cabezaSectorSeleccionada}
                        onChange={(e) => setCabezaSectorSeleccionada(e.target.value)}
                    >
                        {cabezasSector.map((cs) => (
                            <option key={cs.id} value={cs.id}>{cs.nombre}</option>
                        ))}
                    </select>
                </div>
                <div className="col-md-3 mb-3">
                    <label htmlFor="">Dependencia</label>
                    <select
                        className="form-select"
                        value={dependenciaSeleccionada}
                        onChange={(e) => setDependenciaSeleccionada(e.target.value)}
                        disabled={cabezaSectorSeleccionada === 'Todas'}
                    >
                        {dependencias.map((dep) => (
                            <option key={dep.id} value={dep.id}>{dep.nombre}</option>
                        ))}
                    </select>
                </div>
                <div className="col-md-3 mb-3">
                    <label htmlFor="">Delegación</label>
                    <select
                        className="form-select"
                        value={delegacionSeleccionada}
                        onChange={(e) => setDelegacionSeleccionada(e.target.value)}
                        disabled={dependenciaSeleccionada === 'Todas'}
                    >
                        {delegaciones.map((del) => (
                            <option key={del.id} value={del.id}>{del.nombre}</option>
                        ))}
                    </select>
                </div>
                <div className="col-md-3 mb-3">
                    <label htmlFor="">Departamento</label>
                    <select
                        className="form-select"
                        value={areaSeleccionada}
                        onChange={(e) => setAreaSeleccionada(e.target.value)}
                        disabled={delegacionSeleccionada === 'Todas'}
                    >
                        {areas.map((area) => (
                            <option key={area.id} value={area.id}>{area.nombre}</option>
                        ))}
                    </select>
                </div>
            </div>
            <div className="row mb-4">
                <div className="col-md-8 mb-3">
                    <div className="input-group">
                        <input
                            type="text"
                            className="form-control"
                            placeholder="Ingresa un parámetro para buscar"
                            value={busqueda}
                            onChange={(e) => setBusqueda(e.target.value)}
                        />
                        <button className="btn btn-primary" onClick={() => setCurrentPage(1)}>
                            Buscar
                        </button>
                    </div>
                </div>
                <div className="col-md-4 mb-3">
                    <select
                        className="form-select"
                        value={perPage}
                        onChange={(e) => setPerPage(Number(e.target.value))}
                    >
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                    </select>
                </div>
            </div>
            <div className="table-responsive">
                <table className="table table-striped table-bordered">
                    <thead className="table-dark">
                        <tr>
                            <th>Folio</th>
                            <th>Generado por</th>
                            <th>Área</th>
                            <th>Delegación</th>
                            <th>Dependencia</th>
                            <th>Cabeza de Sector</th>
                            <th>Para</th>
                            <th>Folio Generado</th>
                        </tr>
                    </thead>
                    <tbody>
                        {folios.map((folio) => (
                            <tr key={folio.folio}>
                                <td>{folio.folio}</td>
                                <td>{folio.generado_por}</td>
                                <td>{folio.area}</td>
                                <td>{folio.delegacion}</td>
                                <td>{folio.dependencia}</td>
                                <td>{folio.cabeza_sector}</td>
                                <td>{folio.para}</td>
                                <td>{folio.folio_generado}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
            {renderPagination()}
        </div>
    );
};

export default ListadoFolios;