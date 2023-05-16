import 'dart:convert';
import 'package:http/http.dart' as http;
import '../models/Project.dart';
import 'package:gesty/config/config.dart';

class ProjectApiService {
  static Future<List<Project>> getProjects(int companyId) async {
    final response = await http.post(
      Uri.parse('$base_url/get-projects'),
      headers: headers,
      body: 'company_id: $companyId',
    );
    if (response.statusCode == 200) {
      List parsedList = json.decode(response.body);
      return parsedList.map((e) => Project.fromJson(e)).toList();
    } else {
      throw Exception(response.body);
    }
  }
}
