import React from 'react';
import ReactDOM from 'react-dom/client';

function Mailbox() {
  return (
    <div className="flex h-screen bg-gray-100">
      {/* Sidebar */}
      <div className="w-64 bg-white border-r shadow-sm">
        <div className="p-4">
          <h2 className="text-2xl font-bold mb-4 text-primary">Buzón</h2>
          <Button className="w-full mb-4">
            <Mail className="mr-2 h-4 w-4" /> Nuevo Correo
          </Button>
          <nav className="space-y-2">
            <Button variant="ghost" className="w-full justify-start">
              <Inbox className="mr-2 h-4 w-4" /> Bandeja de entrada
            </Button>
            <Button variant="ghost" className="w-full justify-start">
              <Send className="mr-2 h-4 w-4" /> Enviados
            </Button>
            <Button variant="ghost" className="w-full justify-start">
              <File className="mr-2 h-4 w-4" /> Borradores
            </Button>
            <Button variant="ghost" className="w-full justify-start">
              <AlertCircle className="mr-2 h-4 w-4" /> Spam
            </Button>
            <Button variant="ghost" className="w-full justify-start">
              <Trash2 className="mr-2 h-4 w-4" /> Papelera
            </Button>
            <Separator className="my-4" />
            <Button variant="ghost" className="w-full justify-start">
              <Tag className="mr-2 h-4 w-4" /> Etiquetas
            </Button>
          </nav>
        </div>
      </div>

      {/* Main content */}
      <div className="flex-1 flex flex-col">
        <div className="bg-white p-4 shadow-sm">
          <Input
            type="text"
            placeholder="Buscar correos..."
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            className="max-w-sm"
            prefix={<Search className="h-4 w-4 text-gray-400" />}
          />
        </div>
        {selectedEmail ? (
          // Email view
          <div className="flex-1 p-6 bg-white m-4 rounded-lg shadow-sm">
            <Button variant="ghost" onClick={handleBackToList} className="mb-4">
              <ArrowLeft className="mr-2 h-4 w-4" /> Volver a la lista
            </Button>
            <div className="flex justify-between items-center mb-4">
              <h2 className="text-2xl font-bold text-primary">{selectedEmail.subject}</h2>
              <div>
                <Button variant="ghost" size="icon">
                  <Archive className="h-4 w-4" />
                </Button>
                <Button variant="ghost" size="icon">
                  <Trash2 className="h-4 w-4" />
                </Button>
                <Button variant="ghost" size="icon">
                  <Star className="h-4 w-4" />
                </Button>
              </div>
            </div>
            <div className="flex items-center mb-4">
              <Avatar className="h-10 w-10 mr-4">
                <AvatarImage src={`https://api.dicebear.com/6.x/initials/svg?seed=${selectedEmail.sender}`} />
                <AvatarFallback>{selectedEmail.sender[0].toUpperCase()}</AvatarFallback>
              </Avatar>
              <div>
                <div className="font-semibold">{selectedEmail.sender}</div>
                <div className="text-sm text-gray-500">
                  {format(selectedEmail.date, 'dd MMM yyyy HH:mm')}
                </div>
              </div>
            </div>
            <Separator className="my-4" />
            <div className="text-gray-700 whitespace-pre-wrap">{selectedEmail.body}</div>
          </div>
        ) : (
          // Email list view
          <ScrollArea className="flex-1 p-6">
            <h2 className="text-2xl font-bold mb-4 text-primary">Bandeja de entrada</h2>
            {filteredEmails.map((email) => (
              <div
                key={email.id}
                className="p-4 bg-white rounded-lg shadow-sm mb-4 cursor-pointer hover:shadow-md transition-shadow duration-200"
                onClick={() => handleEmailClick(email)}
              >
                <div className="flex justify-between items-center mb-2">
                  <span className={`font-medium ${!email.read ? 'font-bold text-primary' : ''}`}>
                    {email.sender}
                  </span>
                  <span className="text-sm text-gray-500">
                    {format(email.date, 'dd MMM HH:mm')}
                  </span>
                </div>
                <div className={`text-sm ${!email.read ? 'font-semibold' : ''}`}>
                  {email.subject}
                </div>
                <div className="text-sm text-gray-500 truncate">
                  {email.body}
                </div>
              </div>
            ))}
          </ScrollArea>
        )}
      </div>
    </div>
  )
}

export default Mailbox;

if (document.getElementById('mailbox')) {
    const root = ReactDOM.createRoot(document.getElementById('mailbox'));
    root.render(<Mailbox />);
}