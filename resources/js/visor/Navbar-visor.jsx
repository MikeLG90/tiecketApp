import Link from 'next/link'

export default function Navbar() {
  return (
    <nav className='navbar navbar-expand-lg navbar-dark bg-dark'>
     <div className='container-fluid'>
        <Link href="/" className="navbar-brand">Visor de Libros</Link>
        <Link href="/crear-folio" className="btn btn-outline-light">Volver</Link>
     </div>
    </nav>
  )
}