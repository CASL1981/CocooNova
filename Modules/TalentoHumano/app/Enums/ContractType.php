<?php

namespace Modules\TalentoHumano\App\Enums;

enum ContractType: string
{
    case Fixed             = 'fijo';
    case IndefiniteTrust   = 'indefinido_confianza';
    case Indefinite        = 'indefinido';
    case LaborWork         = 'obra_labor';

    public function label(): string
    {
        return match($this) {
            self::Fixed           => 'Fijo',
            self::IndefiniteTrust => 'Indefinido de Confianza',
            self::Indefinite      => 'Indefinido',
            self::LaborWork       => 'Obra o Labor',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::Fixed => 'text-primary',
            self::IndefiniteTrust => 'text-warning',
            self::Indefinite => 'text-success',
            self::LaborWork => 'text-secondary',
        };
    }

    // ─────────────────────────────────────────────
    //  Descripción extendida
    // ─────────────────────────────────────────────
    public function descripcion(): string
    {
        return match($this) {
            self::Fixed               => 'Contrato a término fijo con fecha de vencimiento definida.',
            self::IndefiniteTrust => 'Contrato indefinido para cargos de dirección o confianza.',
            self::Indefinite         => 'Contrato a término indefinido sin fecha de terminación.',
            self::LaborWork          => 'Contrato por duración de una obra o labor específica.',
        };
    }

    // ─────────────────────────────────────────────
    //  Color Bootstrap 5 para badges / etiquetas
    // ─────────────────────────────────────────────
    public function badgeClass(): string
    {
        return match($this) {
            self::Fixed               => 'badge bg-primary',
            self::IndefiniteTrust => 'badge bg-warning text-dark',
            self::Indefinite         => 'badge bg-success',
            self::LaborWork          => 'badge bg-secondary',
        };
    }

    // ─────────────────────────────────────────────
    //  Array ['value' => 'label'] para <select>
    //  Uso: TipoContrato::toSelectArray()
    // ─────────────────────────────────────────────
    public static function toSelectArray(): array
    {
        return array_column(
            array_map(
                fn(self $case) => ['value' => $case->value, 'label' => $case->label()],
                self::cases()
            ),
            'label',
            'value'
        );
    }

    // ─────────────────────────────────────────────
    //  Colección de objetos [value, label, descripcion, badgeClass]
    //  Útil para tablas, componentes Livewire avanzados
    // ─────────────────────────────────────────────
    public static function toCollection(): array
    {
        return array_map(fn(self $case) => [
            'value'       => $case->value,
            'label'       => $case->label(),
            'descripcion' => $case->descripcion(),
            'badgeClass'  => $case->badgeClass(),
        ], self::cases());
    }

    // ─────────────────────────────────────────────
    //  Regla de validación Laravel: 'in:fijo,...'
    //  Uso: $request->validate(['tipo' => TipoContrato::toValidationRule()])
    // ─────────────────────────────────────────────
    public static function toValidationRule(): string
    {
        return 'in:' . implode(',', array_column(self::cases(), 'value'));
    }

    // ─────────────────────────────────────────────
    //  Instancia desde string de forma segura (sin excepción)
    //  Uso: TipoContrato::fromSafe('fijo') ?? TipoContrato::Indefinido
    // ─────────────────────────────────────────────
    public static function fromSafe(string $value): ?self
    {
        return self::tryFrom($value);
    }
}