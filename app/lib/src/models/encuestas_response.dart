// To parse this JSON data, do
//
//     final encuestasResponse = encuestasResponseFromMap(jsonString);

import 'dart:convert';

List<EncuestaResponse> encuestasResponseFromMap(String str) => List<EncuestaResponse>.from(json.decode(str).map((x) => EncuestaResponse.fromMap(x)));

String encuestasResponseToMap(List<EncuestaResponse> data) => json.encode(List<dynamic>.from(data.map((x) => x.toMap())));

class EncuestaResponse {
    EncuestaResponse({
        required this.id,
        required this.titulo,
        required this.descripcion,
        required this.fechaVigencia,
        required this.limiteRespuestas,
        required this.encuestadorId,
        required this.updatedAt,
        required this.createdAt,
        required this.secciones,
    });

    final String id;
    final String titulo;
    final String descripcion;
    final DateTime fechaVigencia;
    final int limiteRespuestas;
    final String encuestadorId;
    final DateTime updatedAt;
    final DateTime createdAt;
    final List<Seccion> secciones;

    factory EncuestaResponse.fromMap(Map<String, dynamic> json) => EncuestaResponse(
        id: json["_id"],
        titulo: json["titulo"],
        descripcion: json["descripcion"],
        fechaVigencia: DateTime.parse(json["fecha_vigencia"]),
        limiteRespuestas: json["limite_respuestas"].toInt(),
        encuestadorId: json["encuestador_id"],
        updatedAt: DateTime.parse(json["updated_at"]),
        createdAt: DateTime.parse(json["created_at"]),
        secciones: List<Seccion>.from(json["secciones"].map((x) => Seccion.fromMap(x))),
    );

    Map<String, dynamic> toMap() => {
        "_id": id,
        "titulo": titulo,
        "descripcion": descripcion,
        "fecha_vigencia": "${fechaVigencia.year.toString().padLeft(4, '0')}-${fechaVigencia.month.toString().padLeft(2, '0')}-${fechaVigencia.day.toString().padLeft(2, '0')}",
        "limite_respuestas": limiteRespuestas,
        "encuestador_id": encuestadorId,
        "updated_at": updatedAt.toIso8601String(),
        "created_at": createdAt.toIso8601String(),
        "secciones": List<dynamic>.from(secciones.map((x) => x.toMap())),
    };
}

class Seccion {
    Seccion({
        required this.id,
        required this.titulo,
        required this.descripcion,
        required this.encuestaId,
        required this.updatedAt,
        required this.createdAt,
        required this.preguntas,
    });

    final String id;
    final String titulo;
    final String descripcion;
    final String encuestaId;
    final DateTime updatedAt;
    final DateTime createdAt;
    final List<Pregunta> preguntas;

    factory Seccion.fromMap(Map<String, dynamic> json) => Seccion(
        id: json["_id"],
        titulo: json["titulo"],
        descripcion: json["descripcion"],
        encuestaId: json["encuesta_id"],
        updatedAt: DateTime.parse(json["updated_at"]),
        createdAt: DateTime.parse(json["created_at"]),
        preguntas: List<Pregunta>.from(json["preguntas"].map((x) => Pregunta.fromMap(x))),
    );

    Map<String, dynamic> toMap() => {
        "_id": id,
        "titulo": titulo,
        "descripcion": descripcion,
        "encuesta_id": encuestaId,
        "updated_at": updatedAt.toIso8601String(),
        "created_at": createdAt.toIso8601String(),
        "preguntas": List<dynamic>.from(preguntas.map((x) => x.toMap())),
    };
}

class Pregunta {
    Pregunta({
        required this.id,
        required this.enunciado,
        required this.tipoPregunta,
        required this.tipoSeleccion,
        required this.tipoEntrada,
        required this.seccionId,
        required this.updatedAt,
        required this.createdAt,
        required this.opciones,
    });

    final String id;
    final String enunciado;
    final String tipoPregunta;
    final String tipoSeleccion;
    final String tipoEntrada;
    final String seccionId;
    final DateTime updatedAt;
    final DateTime createdAt;
    final List<Opcion> opciones;

    factory Pregunta.fromMap(Map<String, dynamic> json) => Pregunta(
        id: json["_id"],
        enunciado: json["enunciado"],
        tipoPregunta: json["tipo_pregunta"],
        tipoSeleccion: json["tipo_seleccion"],
        tipoEntrada: json["tipo_entrada"],
        seccionId: json["seccion_id"],
        updatedAt: DateTime.parse(json["updated_at"]),
        createdAt: DateTime.parse(json["created_at"]),
        opciones: List<Opcion>.from(json["opciones"].map((x) => Opcion.fromMap(x))),
    );

    Map<String, dynamic> toMap() => {
        "_id": id,
        "enunciado": enunciado,
        "tipo_pregunta": tipoPregunta,
        "tipo_seleccion": tipoSeleccion,
        "tipo_entrada": tipoEntrada,
        "seccion_id": seccionId,
        "updated_at": updatedAt.toIso8601String(),
        "created_at": createdAt.toIso8601String(),
        "opciones": List<dynamic>.from(opciones.map((x) => x.toMap())),
    };
}

class Opcion {
    Opcion({
        required this.id,
        required this.valor,
        required this.preguntaId,
        required this.updatedAt,
        required this.createdAt,
    });

    final String id;
    final String valor;
    final String preguntaId;
    final DateTime updatedAt;
    final DateTime createdAt;

    factory Opcion.fromMap(Map<String, dynamic> json) => Opcion(
        id: json["_id"],
        valor: json["valor"],
        preguntaId: json["pregunta_id"],
        updatedAt: DateTime.parse(json["updated_at"]),
        createdAt: DateTime.parse(json["created_at"]),
    );

    Map<String, dynamic> toMap() => {
        "_id": id,
        "valor": valor,
        "pregunta_id": preguntaId,
        "updated_at": updatedAt.toIso8601String(),
        "created_at": createdAt.toIso8601String(),
    };
}
