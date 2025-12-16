<?php
namespace App\Actions;
use App\Models\Document;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateDocumentAction
{
    public static function handle(Request $request): JsonResponse
    {
        $file = $request->file('file');
        $path = $file->store('private/documents', 'local');

        $encryptionKey = 'key_' . uniqid();

        Document::create([
           'order_id' => $request->order_id,
           'document_type' => $request->document_type,
           'file_path' => $path,
           'encryption_key' => $encryptionKey,
           'uploaded_by_admin' => auth()->user()->is_admin,
        ]);
        return response()->json([
            'message' => 'Документ успешно загружен',
        ],201);
    }
}
