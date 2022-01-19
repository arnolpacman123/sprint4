import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:logger/logger.dart';

import 'package:app/src/models/encuestas_response.dart';
import 'package:app/src/global/environment.dart';

class EncuestasService with ChangeNotifier {
  static Logger logger = Logger();
  late EncuestaResponse encuesta;

  static Future<List<EncuestaResponse>> getEncuestas() async {
    final url = Uri.parse('${Environment.apiUrl}/encuestas');
    final response = await http.get(url);
    if (response.statusCode == 200) {
      final encuestasResponse = encuestasResponseFromMap(response.body);
      return encuestasResponse;
    }
    return [];
  }

  Future<bool> postEncuesta(List request) async {
    print(request);
    return false;
  }
}
