import 'dart:convert';
import 'package:http/http.dart' as http;
import '../models/Task.dart';
import 'package:gesty/config/config.dart';

class TaskApiService {
  static Future<List<Task>> getTasks(int projectId) async {
    final response = await http.post(
      Uri.parse('$base_url/tasks'),
      headers: headers,
      body: 'project_id: $projectId',
    );
    if (response.statusCode == 200) {
      List parsedList = json.decode(response.body);
      return parsedList.map((e) => Task.fromJson(e)).toList();
    } else {
      throw Exception(response.body);
    }
  }
}
