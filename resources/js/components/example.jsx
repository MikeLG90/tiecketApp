import React, { useState, useEffect } from "react";
import axios from "axios";

const ListadoResoluciones = () => {
    const [resoluciones, setResoluciones] = useState([]);
    const [oficinas, setOficinas] = useState([]);
    const [filtros, setFiltros] = useState({
        oficina_id: "",
        tipo: "",
        estatus: "",
    });
    const [pagina, setPagina] = useState(1);
    const [ultimaPagina, setUltimaPagina] = useState(1);

    useEffect(() => {
        fetchOficinas();
        fetchResoluciones();
    }, [filtros, pagina]);

    const fetchOficinas = async () => {
        try {
            const response = await axios.get("http://127.0.0.1:8000/api/oficinas");
            setOficinas(response.data);
        } catch (error) {
            console.error("Error al obtener oficinas", error);
        }
    };

    const fetchResoluciones = async () => {
        try {
            const response = await axios.get("http://127.0.0.1:8000/api/resoluciones", {
                params: { ...filtros, page: pagina },
            });
            setResoluciones(response.data.data);
            setUltimaPagina(response.data.last_page);
        } catch (error) {
            console.error("Error al obtener resoluciones", error);
        }
    };

    const handleFiltroChange = (e) => {
        setFiltros({ ...filtros, [e.target.name]: e.target.value });
        setPagina(1);
    };

    return (
        <div>
            <h2>Listado de Resoluciones</h2>
            <div>
                <select name="oficina_id" value={filtros.oficina_id} onChange={handleFiltroChange}>
                    <option value="">Todas las Oficinas</option>
                    {oficinas.map((oficina) => (
                        <option key={oficina.id} value={oficina.id}>{oficina.nombre}</option>
                    ))}
                </select>
                <select name="tipo" value={filtros.tipo} onChange={handleFiltroChange}>
                    <option value="">Todos los Tipos</option>
                    <option value="1">Tipo 1</option>
                    <option value="2">Tipo 2</option>
                </select>
                <select name="estatus" value={filtros.estatus} onChange={handleFiltroChange}>
                    <option value="">Todos los Estatus</option>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    {resoluciones.map((resolucion) => (
                        <tr key={resolucion.id}>
                            <td>{resolucion.id}</td>
                            <td>{resolucion.nombre}</td>
                            <td>{resolucion.tipo}</td>
                            <td>{resolucion.estatus}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
            <div>
                <button disabled={pagina === 1} onClick={() => setPagina(pagina - 1)}>
                    Anterior
                </button>
                <span>Página {pagina} de {ultimaPagina}</span>
                <button disabled={pagina === ultimaPagina} onClick={() => setPagina(pagina + 1)}>
                    Siguiente
                </button>
            </div>
        </div>
    );
};

export default ListadoResoluciones;
