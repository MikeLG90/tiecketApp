import { useState } from 'react'
import { ChevronLeft, ChevronRight, ZoomIn, ZoomOut, Download, Printer } from 'lucide-react'

export default function PdfViewer({ url }) {
    const [pageNumber, setPageNumber] = useState(1)
    const [zoom, setZoom] = useState(100)

    const handlePrevPage = () => setPageNumber((prev) => Math.max(prev - 1, 1))
    const handleNextPage = () => setPageNumber((prev) => prev + 1)
    const handleZoomIn = () => setZoom((prev) => Math.min(prev + 10, 200))
    const handleZoomOut = () => setZoom((prev) => Math.max(prev - 10, 50))

    return (
        <div className='bg-white rounded-lg shadow-md p-4'>
          <div className='flex justify-center space-x-4 mb-4'>
            
          </div>
        </div>
    )
}