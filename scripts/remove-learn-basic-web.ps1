# PowerShell script para eliminar la carpeta learn-basic-web si existe
$path = Join-Path $PSScriptRoot '..\learn-basic-web'
if (Test-Path $path) {
    Write-Host "Eliminando carpeta: $path"
    Remove-Item -Recurse -Force $path
    Write-Host "Carpeta eliminada."
} else {
    Write-Host "No se encontró la carpeta: $path"
}
